<html>

<body class="">
    <div>
        <form action='' method='post'>
            @csrf
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
            @endif

            @if (session('success'))
                {{ session('success') }}
            @endif
            <label>Phone numbers (seperate with a comma [,])</label>
            <input type='text' name='numbers' />

            <label class="login">Message</label>
            <textarea name='message'></textarea>

            <button type='submit'>Send!</button>
        </form>
    </div>
    </div>
    <div class="container">
        <div class="row mt-5">
         <div class="col-sm-8 mx-auto">
             <div class="card-body">

             </div>
        </div>
        </div>
    </div>
</body>

</html>
