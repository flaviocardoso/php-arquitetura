CREATE TABLE student (
    cpf TEXT PRIMARY KEY,
    name TEXT,
    email TEXT
);
CREATE TABLE telephone (
    ddd TEXT,
    num TEXT,
    cpf_student TEXT,
    PRIMARY KEY (ddd, numm),
    FOREIGN KEY(cpf_student) REFERENCES student(cpf)
);
CREATE TABLE recommendation (
    cpf_indicative TEXT,
    cpf_indicated TEXT,
    data_indication TEXT,
    PRIMARY KEY (cpf_indicative, cpf_indicated),
    FOREIGN KEY(cpf_indicative) REFERENCES student(cpf),
    FOREIGN KEY(cpf_indicated) REFERENCES student(cpf)
)