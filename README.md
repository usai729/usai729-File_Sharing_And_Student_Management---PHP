# usai729-File_Sharing_And_Student_Management---PHP

Hi!

I've used `PHP, HTML, CSS` and a little bit of `Javascript` for this project.<br>
`MySQL` is for the database.

Originally made for a educational institution.

So the database code goes like,

First create a database for files and use that db.
`CREATE DATABASE files;`
`USE files;`

Create a table for files which contains the file address in `LONGBLOB` datatype

```
CREATE TABLE files(
    fileId INT AUTO_INCREMENT,
    fileAddr LONGBLOB,
    PRIMARY KEY(fileId),
    class INT
);
```

Create a table to store the youtube links that have been posted to the site

```
CREATE TABLE youtubeLinks(
    linkID INT AUTO_INCREMENT,
    link TEXT,
    class INT,
    PRIMARY KEY(linkID)
);
```

Create a table to store the data of students that want to be accepted to the site

```
CREATE TABLE pendingStudents (
    PstuId INT AUTO_INCREMENT,
    stuPassword TEXT NOT NULL,
    stuName VARCHAR(150),
    stuPhNo INT,
    stuClass INT,
    PRIMARY KEY(PstuId)
);
```

Create a table to store the students data who were accepted by the admin

```
CREATE TABLE students(
    stuId INT AUTO_INCREMENT,
    stuPassword TEXT NOT NULL,
    stuName VARCHAR(150),
    stuPhNo INT,
    stuClass INT,
    PRIMARY KEY(stuId)
);
```
