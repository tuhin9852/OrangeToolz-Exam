<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .card-header{
            color: white;
            background: black;
            font-weight: bold;
            text-align: center;
        }

        .card{
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
</head>

<body>






    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h2>Pagination Using Vanilla JS</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            
                            <th scope="col">Email</th>
                            <th scope="col">DOB</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center" id="pagination">


                    </ul>
                </nav>
            </div>
        </div>

    </div>




    <div class="container mt-5 mb-5">

        <div class="card">
            <div class="card-header">
                <h2>Pagination Using Laravel</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered ">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">#</th>
                            
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">DOB</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $data)
                            <tr>
                                <th scope="row">{{ $data->id }}</th>
                                
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->dob }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $students->links() !!}
                </div>
            </div>
        </div>

    </div>

</body>
<script>
    $(document).ready(function() {





        let url = "{{ Url('/convert-to-json') }}";

        let body = $("#tbody");



        $.get(url, function(data, status) {
            console.log(data.links);
            data.data.forEach(element => {
                let row =
                    `<tr><td>${element.id}</td><td>${element.name}</td>  <td>${element.email}</td> <td>${element.dob}</td> </tr>`;
                $('#tbody').append(row);
            });

            data.links.forEach(element => {
                let ul = element.url;
                let row =
                    `<li class="page-item" onclick="dataAdd('${ul}')"><a class="page-link" >${element.label}</a></li>`;
                $('#pagination').append(row);
            });

        });





    });

    function dataAdd(urlP) {

        $('#tbody').empty();

        $.get(urlP, function(data, status) {

            for (const [key, value] of Object.entries(data.data)) {
                let row =
                    `<tr><td>${value.id}</td><td>${value.name}</td>  <td>${value.email}</td> <td>${value.dob}</td> </tr>`;
                $('#tbody').append(row);
            }
            $('#pagination').empty();
            data.links.forEach(element => {
                let ul = element.url;
                console.log(ul);
                let row =
                    `<li class="page-item" onclick="dataAdd('${ul}')"><a class="page-link" >${element.label}</a></li>`;
                $('#pagination').append(row);
            });
        })

    }
</script>

</html>
