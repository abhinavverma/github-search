<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Innoscripta test (Github trending)</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>header section</h1>
                        <div class="row pb-3">
                                <div class="s003 col-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('index') }}">
                                        {{ csrf_field() }}
                                        <div class="inner-form">
                                            <div class="input-field first-wrap">
                                                <div class="input-select">
                                                    <select data-trigger="" name="stype">
                                                        <option placeholder="">Name</option>
                                                        <option>Owner</option>
                                                        <option>Stars</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-field second-wrap">
                                                <input id="search" name="keyword" type="text" placeholder="Enter Keywords?" />
                                            </div>
                                            <div class="input-field third-wrap">
                                                <button class="btn-search" type="submit">
                                                    <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table" id="GithubTable">
                                            <thead>
                                                <tr>
                                                    <th>name</th>
                                                    <th>description</th>
                                                    <th>stars</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($res as $k => $v)
                                                <tr>
                                                    <td>{{$v->name}}</td>
                                                    <td>{!! $v->description !!}</td>
                                                    <td>{{$v->stars}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <aside>
                                This is placeholder of sidebar
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <hr>
                        <small>this is footer example</small>
                        <p>Created by: Abhinav Verma</p>
                        <p>Contact information: <a href="mailto:abhinav.verma20@gmail.com">abhinav.verma20@gmail.com.</p>
                    </a>
                </p>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/extention/choices.js') }}"></script>
        <script>
            const choices = new Choices('[data-trigger]',
            {
                searchEnabled: false,
                itemSelectText: '',
            });
            $(document).ready( function () {
                $('#GithubTable').DataTable();
            });
        </script>
    </body>
</html>
