<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6fb;
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 20px 48px;
        }

        .hero {
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #fff;
            border-radius: 20px;
            padding: 28px;
            margin-bottom: 24px;
        }

        .hero p {
            margin: 8px 0 0;
        }

        .nav {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin: 20px 0 0;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 14px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 999px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }

        .card h2,
        .card h3 {
            margin-top: 0;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
        }

        th,
        td {
            border: 1px solid #dbe4f0;
            padding: 10px 12px;
            text-align: left;
        }

        th {
            background: #eff6ff;
        }

        .summary-list {
            margin: 0;
            padding-left: 18px;
        }

        .summary-list li + li {
            margin-top: 8px;
        }

        .pagination {
            margin-top: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .pagination-summary {
            color: #475569;
            font-size: 14px;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background: #fff;
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 600;
        }

        .pagination-links a:hover {
            background: #dbeafe;
        }

        .pagination-links .active {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #fff;
        }

        .pagination-links .disabled {
            color: #94a3b8;
            background: #f8fafc;
        }

        .empty {
            color: #6b7280;
            font-style: italic;
        }
    </style>
</head>
<body>
    @php
        $formatBirthday = static function ($birthday): string {
            $birthday = (string) $birthday;

            if (preg_match('/^\d{8}$/', $birthday) === 1) {
                return substr($birthday, 0, 4) . '-' . substr($birthday, 4, 2) . '-' . substr($birthday, 6, 2);
            }

            return $birthday;
        };
    @endphp

    <div class="container">
        <section class="hero">
            <h1>{{ $pageTitle }}</h1>
            <p>
                Method: <strong>{{ $methodName }}</strong><br>
                Technique: <strong>{{ $technique }}</strong><br>
                JSON Source: <strong>database/data/person_data.json</strong>
            </p>

            <nav class="nav">
                <a href="{{ route('person.basic') }}">Raw SQL</a>
                <a href="{{ route('person.paginate') }}">Query Builder</a>
                <a href="{{ route('person.orm') }}">Eloquent ORM</a>
            </nav>
        </section>

        <section class="grid">
            <article class="card">
                <h2>Teacher Count Older Than 50</h2>
                <p>{{ $teacherCountOlderThan50 }}</p>
            </article>

            <article class="card">
                <h2>Mutation Summary</h2>
                <ul class="summary-list">
                    @foreach ($mutationSummary as $item)
                        <li><strong>{{ $item['label'] }}:</strong> {{ $item['value'] }}</li>
                    @endforeach
                </ul>
            </article>
        </section>

        <section class="card">
            <h2>{{ $paginatedPersons ? 'Paginated Persons' : 'All Persons' }}</h2>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Sex</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($allPersons as $person)
                            <tr>
                                <td>{{ $person->id }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $formatBirthday($person->birthday) }}</td>
                                <td>{{ $person->sex }}</td>
                                <td>{{ $person->department }}</td>
                                <td>{{ $person->role }}</td>
                                <td>{{ $person->phone }}</td>
                                <td>{{ $person->age }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty">No person records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($paginatedPersons)
                <div class="pagination">
                    <span class="pagination-summary">
                        Showing {{ $paginatedPersons->firstItem() }} to {{ $paginatedPersons->lastItem() }}
                        of {{ $paginatedPersons->total() }} results
                    </span>

                    <div class="pagination-links">
                        @if ($paginatedPersons->onFirstPage())
                            <span class="disabled">Previous</span>
                        @else
                            <a href="{{ $paginatedPersons->previousPageUrl() }}">Previous</a>
                        @endif

                        @foreach ($paginatedPersons->getUrlRange(max(1, $paginatedPersons->currentPage() - 2), min($paginatedPersons->lastPage(), $paginatedPersons->currentPage() + 2)) as $page => $url)
                            @if ($page === $paginatedPersons->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($paginatedPersons->hasMorePages())
                            <a href="{{ $paginatedPersons->nextPageUrl() }}">Next</a>
                        @else
                            <span class="disabled">Next</span>
                        @endif
                    </div>
                </div>
            @endif
        </section>

        <section class="grid" style="margin-top: 24px;">
            <article class="card">
                <h3>All Teachers</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Phone</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $person)
                                <tr>
                                    <td>{{ $person->id }}</td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->department }}</td>
                                    <td>{{ $person->phone }}</td>
                                    <td>{{ $person->age }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty">No teacher records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </article>

            <article class="card">
                <h3>Students Older Than 30</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Phone</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($studentsOlderThan30 as $person)
                                <tr>
                                    <td>{{ $person->id }}</td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->department }}</td>
                                    <td>{{ $person->phone }}</td>
                                    <td>{{ $person->age }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty">No matching student records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
    </div>
</body>
</html>