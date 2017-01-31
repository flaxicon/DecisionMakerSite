<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Decision Maker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
    background: #000000;
    color: #ffffff;
    font-family: Tahoma, Geneva, sans-serif;
    font-size: x-large;
    padding: 10px;
    }
    h1 {
    font-size: 36pt;
    font-style: normal;
    font-weight: bolder;
    font-variant: small-caps;
    }
    hr{
    color: #white;
    font-size: 6pt;
    }
    a:link,a:visited,a:active,a:hover,{
    color: #black;
    }
    #copyright {
    font-size: x-small;
    text-align: center;
    }
        </style>
    </head>
    <body>
    <h1>Decision Maker</h1>
    <p>This site allows you to add options to a list and then chooses one.</br>
    Press new to make a new options list</br>
    Just type in an option click add, then repeat.</br>
    Once all the options are in click Choose and it will make a decision for you</br>
    Not doing the decision it chooses for you will incur the wrath of the goat-monkey curse</br>
    </p>
    </hr>
   {!! Form::open(
  array(
    'route' => 'decision.store', 
    'class' => 'form')
  ) !!}

@if (count($errors) > 0)
<div class="alert alert-danger">
    There were some problems adding the option.<br />
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group">
    {!! Form::label('option to add:') !!}
    {!! Form::text('option', null, 
      array(
        'class'=>'form-control', 
        'placeholder'=>'add an option',
        'name' => 'option'
      )) !!}
</div> </br>
 {!! Form::submit('Add', 
      array('class'=>'btn btn-primary'
    )) !!}
    {!!Form::close()!!}
        <a href="{!! route('new') !!}"><button>New</button></a></br></br>
        <a href="/choose"><button>Choose</button></a></br></br>
        @yield('content')
  <footer>
  <p id="copyright">Web Page copyright &copy;2017 by Ryan Smalley</p>
  </footer>
</body>
</html>