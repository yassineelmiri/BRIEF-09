CREATE DATABASE IF NOT EXISTS Insurance;
USE Insurance;

CREATE TABLE client (
    id INT(40) PRIMARY KEY NOT NULL,
    firstName VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    cnie VARCHAR(40) NOT NULL,
    address VARCHAR(40) NOT NULL,
    date DATE NOT NULL,
    softDelete TIMESTAMP NULL
);

CREATE TABLE insurer (
    id INT(40) PRIMARY KEY NOT NULL,
    name VARCHAR(40) NOT NULL,
    address VARCHAR(40) NOT NULL,
    softDelete TIMESTAMP NULL
);

CREATE TABLE article (
    id INT(40) PRIMARY KEY NOT NULL,
    title VARCHAR(40) NOT NULL,
    description VARCHAR(40) NOT NULL,
    date DATE NOT NULL,
    insurerId INT NOT NULL,
    clientId INT NOT NULL,
    FOREIGN KEY (insurerId) REFERENCES insurer(id) ON DELETE CASCADE,
    FOREIGN KEY (clientId) REFERENCES client(id) ON DELETE CASCADE,
    softDelete TIMESTAMP NULL
);

CREATE TABLE claim (
    id INT(40) PRIMARY KEY NOT NULL,
    description VARCHAR(40) NOT NULL,
    date DATE NOT NULL,
    articleId INT NOT NULL,
    FOREIGN KEY (articleId) REFERENCES article(id) ON DELETE CASCADE,
    softDelete TIMESTAMP NULL
);

CREATE TABLE premium (
    id INT(40) PRIMARY KEY NOT NULL,
    amount VARCHAR(40) NOT NULL,
    date DATE NOT NULL,
    claimId INT NOT NULL,
    FOREIGN KEY (claimId) REFERENCES claim(id) ON DELETE CASCADE,
    softDelete TIMESTAMP NULL
);