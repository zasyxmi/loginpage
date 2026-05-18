# Student Management System

A Laravel-based Student Management System developed for academic lab work using Laravel, MySQL, Laragon, Blade, Bootstrap, and AdminLTE.

This system is designed to manage student records, subjects, lecture halls, days, lecturer groups, and timetable entries through a clean admin dashboard interface.

---

## Features

### Authentication
- Admin login
- Register account
- Logout function
- Route protection for authenticated users

### Dashboard
- AdminLTE dashboard layout
- Sidebar navigation
- User dropdown menu
- Dashboard quick action cards
- Background image from AdminLTE asset
- Counts for students, subjects, halls, days, groups, and timetable entries

### Admin Profile
- Edit admin name
- Edit admin email
- Change password
- Upload/change profile picture
- User dropdown displays current admin name and email

### Student Management
- Add student
- View student list
- View student details
- Edit student
- Delete student
- Student records are stored in the `students` table
- Student email format uses `@student.edu.my`

### Subject Management
- Add subject
- View subject list
- View subject details
- Edit subject
- Delete subject
- Store lecturer name for each subject

### Hall Management
- Add lecture hall
- View hall list
- View hall details
- Edit hall
- Delete hall

### Day Management
- Add day
- View day list
- View day details
- Edit day
- Delete day

### Lecturer Group Management
- Add lecturer group
- View group list
- View group details
- Edit group
- Delete group

### Timetable Management
- Add timetable entry
- View timetable entries
- View timetable details
- Edit timetable entry
- Delete timetable entry
- Select student from `students` table
- Select subject and lecturer from `subjects` table
- Select day, hall, and lecturer group
- Display created date/time
- Display last updated date/time
- Hall conflict validation

---

## Main Modules

| Module | Description |
|---|---|
| Authentication | Admin login, registration, and logout |
| Dashboard | Main admin dashboard using AdminLTE |
| Admin Profile | Manage admin profile details |
| Students | Manage student records |
| Subjects | Manage subjects and lecturer names |
| Halls | Manage lecture halls |
| Days | Manage class days |
| Groups | Manage lecturer groups |
| Timetables | Manage timetable entries |
