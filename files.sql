CREATE DATABASE files;

USE files;

CREATE TABLE files(
    fileId INT AUTO_INCREMENT,
    fileAddr LONGBLOB,
    PRIMARY KEY(fileId),
    class INT
);

CREATE TABLE youtubeLinks(
    linkID INT AUTO_INCREMENT,
    link TEXT,
    class INT,
    PRIMARY KEY(linkID)
);

CREATE TABLE pendingStudents (
    PstuId INT AUTO_INCREMENT,
    stuPassword TEXT NOT NULL,
    stuName VARCHAR(150),
    stuPhNo INT,
    stuClass INT,
    PRIMARY KEY(PstuId)
);

CREATE TABLE students(
    stuId INT AUTO_INCREMENT,
    stuPassword TEXT NOT NULL,
    stuName VARCHAR(150),
    stuPhNo INT,
    stuClass INT,
    PRIMARY KEY(stuId)
);