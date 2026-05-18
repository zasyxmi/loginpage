<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Hall;
use App\Models\LecturerGroup;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Clear old dummy data
        |--------------------------------------------------------------------------
        | Timetable kena delete dulu sebab dia ada foreign key ke subject, hall, day,
        | dan lecturer group.
        */

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Timetable::query()->delete();
        Student::query()->delete();
        Subject::query()->delete();
        Hall::query()->delete();
        Day::query()->delete();
        LecturerGroup::query()->delete();

        /*
        |--------------------------------------------------------------------------
        | Remove old dummy login users only
        |--------------------------------------------------------------------------
        | Jangan truncate users table sebab admin sebenar kau mungkin ada dalam sini.
        */

        User::whereIn('email', [
            'ali@example.com',
            'siti@example.com',
            'aiman@example.com',
            'nurul@example.com',
        ])->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        /*
        |--------------------------------------------------------------------------
        | Admin Login User
        |--------------------------------------------------------------------------
        | Ini untuk login website management system sahaja.
        | Admin ini tidak akan masuk Student List sebab Student List guna students table.
        */

        User::firstOrCreate(
            ['email' => 'asyraf@admin.com'],
            [
                'name' => 'Zarith Asyraf ',
                'password' => Hash::make('password123'),
                'phone_number' => '0182489242',
                'address' => 'Management Office',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Students
        |--------------------------------------------------------------------------
        | Semua student email guna domain @student.edu.my
        */

        $student1 = Student::create([
            'name' => 'Rafiq Syah',
            'email' => 'rafiq@student.edu.my',
            'age' => '21',
            'phone_number' => '0112345678',
            'address' => 'Kuala Lumpur',
        ]);

        $student2 = Student::create([
            'name' => 'Nur Aina',
            'email' => 'aina@student.edu.my',
            'age' => '22',
            'phone_number' => '0123456789',
            'address' => 'Shah Alam',
        ]);

        $student3 = Student::create([
            'name' => 'Muhammad Danish',
            'email' => 'danish@student.edu.my',
            'age' => '23',
            'phone_number' => '0134567890',
            'address' => 'Melaka',
        ]);

        $student4 = Student::create([
            'name' => 'Sofia Iman',
            'email' => 'sofia@student.edu.my',
            'age' => '21',
            'phone_number' => '0145678901',
            'address' => 'Seremban',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Subjects
        |--------------------------------------------------------------------------
        | Lecturer name akan digunakan dalam Timetable section.
        */

        $subject1 = Subject::create([
            'subject_code' => 'ITT626',
            'subject_name' => 'Web Application Development',
            'lecturer_name' => 'Dr. Farah Nabilah',
        ]);

        $subject2 = Subject::create([
            'subject_code' => 'ICT602',
            'subject_name' => 'Mobile Technology',
            'lecturer_name' => 'Puan Aisyah Hamid',
        ]);

        $subject3 = Subject::create([
            'subject_code' => 'CSC574',
            'subject_name' => 'Dynamic Web Application',
            'lecturer_name' => 'Encik Hafiz Rahman',
        ]);

        $subject4 = Subject::create([
            'subject_code' => 'NET546',
            'subject_name' => 'Network Security',
            'lecturer_name' => 'Dr. Azman Ismail',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Halls
        |--------------------------------------------------------------------------
        */

        $hall1 = Hall::create([
            'lecture_hall_name' => 'DK1',
            'lecture_hall_place' => 'Block A',
        ]);

        $hall2 = Hall::create([
            'lecture_hall_name' => 'DK2',
            'lecture_hall_place' => 'Block B',
        ]);

        $hall3 = Hall::create([
            'lecture_hall_name' => 'Computer Lab 1',
            'lecture_hall_place' => 'ICT Building',
        ]);

        $hall4 = Hall::create([
            'lecture_hall_name' => 'Networking Lab',
            'lecture_hall_place' => 'Block C',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Days
        |--------------------------------------------------------------------------
        */

        $monday = Day::create(['day_name' => 'Monday']);
        $tuesday = Day::create(['day_name' => 'Tuesday']);
        $wednesday = Day::create(['day_name' => 'Wednesday']);
        $thursday = Day::create(['day_name' => 'Thursday']);
        $friday = Day::create(['day_name' => 'Friday']);

        /*
        |--------------------------------------------------------------------------
        | Lecturer Groups
        |--------------------------------------------------------------------------
        */

        $group1 = LecturerGroup::create([
            'name' => 'CS251',
            'part' => '5A',
        ]);

        $group2 = LecturerGroup::create([
            'name' => 'CS252',
            'part' => '5B',
        ]);

        $group3 = LecturerGroup::create([
            'name' => 'CS253',
            'part' => '6A',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Timetable Entries
        |--------------------------------------------------------------------------
        | Student timetable selection guna students table melalui student_id.
        | Lecturer name akan datang daripada subject yang dipilih.
        */

        Timetable::create([
            'student_id' => $student1->id,
            'subject_id' => $subject1->id,
            'day_id' => $monday->id,
            'hall_id' => $hall1->id,
            'lecturer_group_id' => $group1->id,
            'time_from' => '08:00',
            'time_to' => '10:00',
        ]);

        Timetable::create([
            'student_id' => $student2->id,
            'subject_id' => $subject2->id,
            'day_id' => $tuesday->id,
            'hall_id' => $hall2->id,
            'lecturer_group_id' => $group2->id,
            'time_from' => '10:00',
            'time_to' => '12:00',
        ]);

        Timetable::create([
            'student_id' => $student3->id,
            'subject_id' => $subject3->id,
            'day_id' => $wednesday->id,
            'hall_id' => $hall3->id,
            'lecturer_group_id' => $group3->id,
            'time_from' => '14:00',
            'time_to' => '16:00',
        ]);

        Timetable::create([
            'student_id' => $student4->id,
            'subject_id' => $subject4->id,
            'day_id' => $thursday->id,
            'hall_id' => $hall4->id,
            'lecturer_group_id' => $group1->id,
            'time_from' => '16:00',
            'time_to' => '18:00',
        ]);
    }
}
