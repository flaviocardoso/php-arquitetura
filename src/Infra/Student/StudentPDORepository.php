<?php 
namespace Flavio\Arquitetura\Infra\Student;

use Flavio\Arquitetura\Domain\CPF;
use Flavio\Arquitetura\Domain\Student\Student;
use Flavio\Arquitetura\Domain\Student\StudentNotFound;
use Flavio\Arquitetura\Domain\Student\StudentRepository;
use PDO;

class StudentPDORepository implements StudentRepository
{
    private PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Student $student): void
    {
        $query = 'INSERT INTO student VALUE (:cpf, :name, :email)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':cpf', $student->cpf());
        $stmt->bindValue(':name', $student->name());
        $stmt->bindValue(':emaim', $student->email());
        $stmt->execute();
        
        $query = 'INSERT INTO telephone VALUE (:ddd, :num, :cpf_student)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':cpf_student', $student->cpf());

        /** @var Telephone $telephone */
        foreach ($student->telephones() as $telephone) {
            $stmt->bindValue(':ddd', $telephone->ddd());
            $stmt->bindValue(':num', $telephone->num());
            $stmt->execute();
        }
    }

    public function searchOfCPF(CPF $cpf): Student
    {
        $query = '
            SELECT cpf, name, email, add, num as num_telephone
             FROM student 
             LEFT JOIN telephone ON telephone.cpf_student = student.cpf 
             WHERE cpf=:cpf
            ';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':cpf', (string) $cpf);
        $stmt->execute();

        $dataStudent = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($dataStudent) === 0) throw new StudentNotFound($cpf);

        return $this->studentMapper($dataStudent);
    }

    private function studentMapper(array $dataStudent): Student 
    {
        $lineFirst = $dataStudent[0];
        $student = Student::withCPFNameEmail($lineFirst['cpf'], $lineFirst['name'], $lineFirst['email']);
        $telephones = array_filter($dataStudent, fn ($line) => $line['ddd'] !== null && $line['num_telephone'] !== null);
        foreach($telephones as $telephone) {
            $student->addTelephone($telephone['ddd'], $telephone['num_telephone']);
        }

        return $student;
    }

    /** @return Student[] */
    public function seachAll(): array
    {
        $query = '
            SELECT cpf, name, email, add, num as num_telephone
             FROM student 
             LEFT JOIN telephone ON telephone.cpf_student = student.cpf
            ';
        $stmt = $this->connection->query($query);

        $studentDataArray = $stmt->fetch(\PDO::FETCH_ASSOC);
        $students = [];

        foreach($studentDataArray as $studentData) {
            if (!array_key_exists($studentData['cpf'], $students)) {
                $students[$studentData['cpf']] = Student::withCPFNameEmail(
                    $studentData['cpf'],
                    $studentData['name'],
                    $studentData['email']
                );
                $telephones = array_filter($studentData, fn ($tp) => $tp['ddd'] !== null && $tp['num_telephone'] !== null);
                foreach($telephones as $telephone) {
                    $students[$studentData['cpf']]->addTelephone($telephone['ddd'], $telephone['num_telephone']);
                }
            }
        }

        return array_values($students);
    }
}

?>