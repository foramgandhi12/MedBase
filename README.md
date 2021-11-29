# MedBase
## How To Install MedBase?
### How To Make The Database?
#### Create New Database Called `medbase`
#### Department Table Query:
```r
CREATE TABLE `departments` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Employee Table Query:
```r
CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `employeeSSN` int(11) NOT NULL,
  `employeePosition` varchar(50) NOT NULL,
  `employeeDepartment` int(11) NOT NULL,
  `employeeAddress` varchar(50) NOT NULL,
  `employeePhoneNo` int(20) NOT NULL,
  `employeePassword` varchar(50) NOT NULL DEFAULT 'WelcomeToMedBase',
  `roleID` int(11) NOT NULL,
  PRIMARY KEY (`employeeID`),
  UNIQUE KEY `employeeSSN_UNIQUE` (`employeeSSN`),
  KEY `departmentID_idx` (`employeeDepartment`),
  CONSTRAINT `departmentID` FOREIGN KEY (`employeeDepartment`) REFERENCES `departments` (`departmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

```

#### Ward Table Query:
```r
CREATE TABLE `ward` (
  `ward_id` int NOT NULL,
  `num_rooms` int NOT NULL DEFAULT '0',
  `ward_name` varchar(50) DEFAULT NULL,
  `ward_location` varchar(50) NOT NULL,
  `ward_description` varchar(50) DEFAULT NULL,
  `extensionNO` varchar(50) NOT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Room Table Query:
```r
CREATE TABLE `room` (
  `roomID` int NOT NULL,
  `roomType` varchar(50) NOT NULL,
  `wardID` int NOT NULL,
  `floorNumber` int NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `departmentID` int DEFAULT NULL,
  `num_beds` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`roomID`),
  KEY `wardID_idx` (`wardID`),
  CONSTRAINT `wardID` FOREIGN KEY (`wardID`) REFERENCES `ward` (`ward_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Patient Table Query:
```r
CREATE TABLE `patients` (
  `patientID` int(11) NOT NULL,
  `patientName` varchar(50) NOT NULL,
  `patientAddress` varchar(50) NOT NULL,
  `patientEmail` varchar(50) DEFAULT NULL,
  `patientPhoneNumber` varchar(45) DEFAULT NULL,
  `ReasonForVisit` varchar(50) NOT NULL,
  `treatment` varchar(50) DEFAULT NULL,
  `ward_ID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `CheckInDate` datetime NOT NULL,
  `doctorID` int(11) DEFAULT NULL,
  `nurseID` int(11) NOT NULL,
  `is_deceased` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patientID`),
  KEY `doctorID_idx` (`doctorID`),
  KEY `nurseID_idx` (`nurseID`),
  KEY `ward_ID_idx` (`ward_ID`),
  KEY `room_id_idx` (`roomID`),
  CONSTRAINT `doctorID` FOREIGN KEY (`doctorID`) REFERENCES `employee` (`employeeID`),
  CONSTRAINT `nurseID` FOREIGN KEY (`nurseID`) REFERENCES `employee` (`employeeID`),
  CONSTRAINT `room_id` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`),
  CONSTRAINT `ward_ID` FOREIGN KEY (`ward_ID`) REFERENCES `ward` (`ward_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

```

#### Medical Records Table Query:
```r
CREATE TABLE `medical_records` (
  `recordID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Allergies` varchar(50) DEFAULT NULL,
  `Height` float NOT NULL,
  `Weight` float NOT NULL,
  `BloodType` varchar(45) NOT NULL,
  `Conditions` varchar(50) DEFAULT NULL,
  `Medications` varchar(50) DEFAULT NULL,
  `FamilyDoctor` varchar(50) DEFAULT NULL,
  `EmergencyContactName` varchar(45) DEFAULT NULL,
  `EmergencyContactNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`recordID`),
  KEY `patientID_idx` (`patientID`),
  CONSTRAINT `patientID` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Reserve Room Table Query:
```r
CREATE TABLE `reserveroom` (
 `reservationID` int(11) NOT NULL AUTO_INCREMENT,
 `roomID` int(11) NOT NULL,
 `doctorID` int(11) NOT NULL,
 `nurseID` int(11) NOT NULL,
 `reservationDate` date NOT NULL,
 `reservationDes` varchar(50) NOT NULL,
 PRIMARY KEY (`reservationID`),
 KEY `roomID` (`roomID`),
 KEY `doctorID` (`doctorID`),
 KEY `nurseID` (`nurseID`),
 CONSTRAINT `reserveroom_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`),
 CONSTRAINT `reserveroom_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `employee` (`employeeID`),
 CONSTRAINT `reserveroom_ibfk_3` FOREIGN KEY (`nurseID`) REFERENCES `employee` (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
```

#### Assign Doctor Table Query:
```r
CREATE TABLE `assigneddoctors` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT, 
  `nurseID` int(11) NOT NULL, 
  `doctorID` int(11) NOT NULL, 
  PRIMARY KEY (`id`), 
  KEY `nurseID` (`nurseID`), 
  KEY `doctorID` (`doctorID`), 
  CONSTRAINT `assigneddoctors_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `employee` (`employeeID`), 
  CONSTRAINT `assigneddoctors_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `employee` (`employeeID`) 
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
```
### How To Clone The Repository?

#### Run Command To Clone Repo And Place The Repo In `wamp64\www` Folder: 
```r 
git clone https://github.com/foramgandhi12/MedBase.git
```
## How To Execute MedBase?
Open the MedBase application by running localhost on your chosen browser through wamp64. Use the following URL in your browser: `http://localhost/MedBase/Login.html`
Upon clicking on the link you will be directed to the login page where you may be able to log in as an Administrator, Nurse, Doctor, or Receptionist.

Note: To add employees to the database, login as an administrator first and add the employee depending on their role (Doctor - 1, Nurse - 2, Receptionist - 3)
### Login As Administrator
Username: `Admin`
Password: `Admin`

#### Add doctor:
![Add Doctor](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/AdminDoctorAdd.png)
#### Add nurse:
![Add Nurse](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/AdminNurseAdd.png)
#### Add receptionist:
![Add Receptionist](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/AdminReceptionistAdd.png)
#### Add employee form:
![Add Employee Form](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/AdminAddEmployeeForm.png)

### Login As Doctor
Username: `FirstName LastName`
Password: `{Password}`

![Doctor Dashboard](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/DoctorDashboard.png)

### Login As Nurse
Username: `FirstName LastName`
Password: `{Password}`

![Nurse Dashbaord](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/NurseDashboard.png)

### Login As Receptionist
Username: `FirstName LastName`
Password: `{Password}`

![Nurse Dashbaord](https://github.com/foramgandhi12/MedBase/blob/main/public/img/README%20imges/ReceptionistDashboard.png)
