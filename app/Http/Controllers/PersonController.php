<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    private const ROLE_TEACHER = 'Teacher';

    private const ROLE_STUDENT = 'Student';

    public function basic(): View
    {
        $allPersons = collect(DB::select('SELECT * FROM person ORDER BY id'));
        $teachers = collect(DB::select('SELECT * FROM person WHERE role = ? ORDER BY id', [self::ROLE_TEACHER]));
        $studentsOlderThan30 = collect(
            DB::select('SELECT * FROM person WHERE role = ? AND age > ? ORDER BY id', [self::ROLE_STUDENT, 30])
        );
        $teacherCountOlderThan50 = DB::selectOne(
            'SELECT COUNT(*) AS total FROM person WHERE role = ? AND age > ?',
            [self::ROLE_TEACHER, 50]
        )?->total ?? 0;

        return view('person.basic', [
            'pageTitle' => 'Task 3: Raw SQL',
            'methodName' => 'basic()',
            'technique' => 'Raw SQL',
            'allPersons' => $allPersons,
            'teachers' => $teachers,
            'studentsOlderThan30' => $studentsOlderThan30,
            'teacherCountOlderThan50' => $teacherCountOlderThan50,
            'mutationSummary' => $this->runRawSqlMutations(),
            'paginatedPersons' => null,
        ]);
    }

    public function paginate(): View
    {
        $paginatedPersons = DB::table('person')->orderBy('id')->paginate(5);
        $teachers = DB::table('person')->where('role', self::ROLE_TEACHER)->orderBy('id')->get();
        $studentsOlderThan30 = DB::table('person')
            ->where('role', self::ROLE_STUDENT)
            ->where('age', '>', 30)
            ->orderBy('id')
            ->get();
        $teacherCountOlderThan50 = DB::table('person')
            ->where('role', self::ROLE_TEACHER)
            ->where('age', '>', 50)
            ->count();

        return view('person.paginate', [
            'pageTitle' => 'Task 3: Query Builder + Pagination',
            'methodName' => 'paginate()',
            'technique' => 'Query Builder',
            'allPersons' => collect($paginatedPersons->items()),
            'teachers' => collect($teachers),
            'studentsOlderThan30' => collect($studentsOlderThan30),
            'teacherCountOlderThan50' => $teacherCountOlderThan50,
            'mutationSummary' => $this->runQueryBuilderMutations(),
            'paginatedPersons' => $paginatedPersons,
        ]);
    }

    public function orm(): View
    {
        $paginatedPersons = Person::query()->orderBy('id')->paginate(5);
        $teachers = Person::query()->where('role', self::ROLE_TEACHER)->orderBy('id')->get();
        $studentsOlderThan30 = Person::query()
            ->where('role', self::ROLE_STUDENT)
            ->where('age', '>', 30)
            ->orderBy('id')
            ->get();
        $teacherCountOlderThan50 = Person::query()
            ->where('role', self::ROLE_TEACHER)
            ->where('age', '>', 50)
            ->count();

        return view('person.orm', [
            'pageTitle' => 'Task 4: Eloquent ORM + Pagination',
            'methodName' => 'orm()',
            'technique' => 'Eloquent ORM',
            'allPersons' => collect($paginatedPersons->items()),
            'teachers' => collect($teachers),
            'studentsOlderThan30' => collect($studentsOlderThan30),
            'teacherCountOlderThan50' => $teacherCountOlderThan50,
            'mutationSummary' => $this->runOrmMutations(),
            'paginatedPersons' => $paginatedPersons,
        ]);
    }

    private function runRawSqlMutations(): array
    {
        return $this->runMutationDemo(function (): array {
            DB::insert(
                'INSERT INTO person (name, birthday, sex, department, role, phone, age) VALUES (?, ?, ?, ?, ?, ?, ?)',
                ['Demo Raw Teacher', 19840115, 'Male', 'ICT', self::ROLE_TEACHER, '01710000123', 42]
            );

            $insertedTeacher = DB::selectOne(
                'SELECT * FROM person WHERE name = ? ORDER BY id DESC LIMIT 1',
                ['Demo Raw Teacher']
            );
            $deletedStudents = DB::delete('DELETE FROM person WHERE role = ? AND age > ?', [self::ROLE_STUDENT, 30]);
            $rowsBeforeDeleteAll = DB::selectOne('SELECT COUNT(*) AS total FROM person')?->total ?? 0;
            $deletedAll = DB::delete('DELETE FROM person');

            return [
                ['label' => 'Inserted teacher', 'value' => $insertedTeacher?->name ?? 'Not inserted'],
                ['label' => 'Students deleted (age > 30)', 'value' => $deletedStudents],
                ['label' => 'Rows before DELETE ALL', 'value' => $rowsBeforeDeleteAll],
                ['label' => 'Rows deleted by DELETE ALL', 'value' => $deletedAll],
            ];
        });
    }

    private function runQueryBuilderMutations(): array
    {
        return $this->runMutationDemo(function (): array {
            $newTeacherId = DB::table('person')->insertGetId([
                'name' => 'Demo Query Builder Teacher',
                'birthday' => 19860324,
                'sex' => 'Female',
                'department' => 'Statistics',
                'role' => self::ROLE_TEACHER,
                'phone' => '01710000456',
                'age' => 40,
            ]);

            $insertedTeacher = DB::table('person')->where('id', $newTeacherId)->first();
            $deletedStudents = DB::table('person')->where('role', self::ROLE_STUDENT)->where('age', '>', 30)->delete();
            $rowsBeforeDeleteAll = DB::table('person')->count();
            $deletedAll = DB::table('person')->delete();

            return [
                ['label' => 'Inserted teacher', 'value' => $insertedTeacher?->name ?? 'Not inserted'],
                ['label' => 'Students deleted (age > 30)', 'value' => $deletedStudents],
                ['label' => 'Rows before DELETE ALL', 'value' => $rowsBeforeDeleteAll],
                ['label' => 'Rows deleted by DELETE ALL', 'value' => $deletedAll],
            ];
        });
    }

    private function runOrmMutations(): array
    {
        return $this->runMutationDemo(function (): array {
            $person = Person::query()->create([
                'name' => 'Demo ORM Teacher',
                'birthday' => 19820709,
                'sex' => 'Male',
                'department' => 'Accounting',
                'role' => self::ROLE_TEACHER,
                'phone' => '01710000789',
                'age' => 44,
            ]);

            $deletedStudents = Person::query()->where('role', self::ROLE_STUDENT)->where('age', '>', 30)->delete();
            $rowsBeforeDeleteAll = Person::query()->count();
            $deletedAll = Person::query()->delete();

            return [
                ['label' => 'Inserted teacher', 'value' => $person->name],
                ['label' => 'Students deleted (age > 30)', 'value' => $deletedStudents],
                ['label' => 'Rows before DELETE ALL', 'value' => $rowsBeforeDeleteAll],
                ['label' => 'Rows deleted by DELETE ALL', 'value' => $deletedAll],
            ];
        });
    }

    private function runMutationDemo(callable $callback): array
    {
        DB::beginTransaction();

        try {
            $summary = $callback();
            DB::rollBack();

            return [
                ...$summary,
                ['label' => 'Transaction status', 'value' => 'Rolled back to keep seeded data unchanged'],
            ];
        } catch (\Throwable $exception) {
            DB::rollBack();

            return [
                ['label' => 'Mutation demo error', 'value' => $exception->getMessage()],
            ];
        }
    }
}
