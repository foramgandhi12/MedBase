# MedBase
## How to intall Medbase?
### How to make the database?
#### Create new database called `medbase`
#### Department table query:
```r
CREATE TABLE `departments` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### Employee table query:
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

#### Ward table query:
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

#### Room table query:
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

#### Patient table query:
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

#### Medical Records table query:
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

#### Reserve Room table query:
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

#### Assign Doctor table query:
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
### How cole the repository?
## How to execute Medbase?
### Login as Administrator
### Login as Doctor
### Login as Nurse
### Login as Receptionist
