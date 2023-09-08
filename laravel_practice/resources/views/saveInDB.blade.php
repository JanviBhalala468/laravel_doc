
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <title>form</title>
</head>
<body>
    <div class="main-container mt-5">
    
        <div id="main " class="container ">
            <h1>Add User</h1>
            <form action="{{URL::to('/')}}/{{$data ?? ''  ? 'editController' : 'saveInDBController' }}" method="POST">
                @csrf
                <div >
                    <div>
                        <input type="hidden" name="id" value="{{ $data['id'] ?? '' }} ">
                    </div>
                    <div>
                        <div for="name"><b>Username *</b></div>
                        <input type="text" name="name" value="{{ $data['name'] ?? '' }} " >
                        <div class="error">@error('name'){{$message}}@enderror</div>
                    </div>
                    <div>
                        <div for="email"><b>Email *</b></div>
                        <input type="email"  name="email"  value="{{ $data['email'] ?? '' }} ">
                        <div class="error">@error('email'){{$message}}@enderror</div>
                    </div>
                    <div>
                        <div for="number"><b>Password *</b></div>
                        <input type="password"  name="password"  >
                        <div class="error">@error('password'){{$message}}@enderror</div>
                    </div>

                

                <button type="submit" class="login">{{$data ?? ''  ? 'Edit' : 'Add' }}</button>
               
            </div>

            </form>
                        
            
        </div>
    <div>
    
</body>
</html>