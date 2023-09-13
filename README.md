<h2>
  Task 1 :Checkout Blank Repo. (Steps to do as followes)
</h2>
<ul>
  <li>Create new Folder (name: laravel_doc)</li>
  <li>oner terminal and go to laravel_doc folder</li>
  <li>Perform following commands
    <ul>
      <li>git init</li>
      <li>git status</li>
    </ul>
  </li>
</ul>
<h2>Task 2 : Create Laravel Project Via Composer (Commit /Push). (Steps to do as followes)</h2>
<ul>
  <li><b>Create Laravel Project in Laracvel_doc folder</b> :  composer create-project laravel/laravel:^8.0 laravel_practice
</li>
  <li><b>Give some Storage permissions : </b>
    <ul>
      <li>chmod -R 777 /var/www/html/laravel_doc/laravel_practice/storage
</li>
      <li>chmod -R 777 /var/www/html/laravel_doc/laravel_practice/storage/framework/views
</li>
      <li>chmod -R 777 /var/www/html/laravel_doc/laravel_practice/storage/framework/views
</li>
    </ul>
  </li>
  <li><b>Add Files in git</b> git add .</li>
  <li><b>Make Commit : </b>git commit -m "Created Laravel Project and Got Welcome Page"
</li>
  <li><b>Create Origin : </b>git remote add origin https://JanviBhalala468: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@github.com/JanviBhalala468/laravel_doc.git
</li>
  <li><b>Push the Data : </b>git push origin master
</li>
</ul>
<h2>Task 3 : Try to run and get working Welcome Page
(Commit/Push).
</h2>
<ul>
  <li><b>Mode to laravel_practice :</b>cd laravel_practice</li>
  <li><b>Run laravel_practice :</b>php artisan serve</li>
  <li>Got Welcome Page</li>
</ul>
<h2>Task 4 : Use Default AUTH</h2>
<ul>
  <li>Composer require Laravel/ui</li>
  <li>php artisan ui bootstrap</li>
  <li>php artisan ui bootstrap --auth</li>
  <li>npm install</li>
  <li>npm run dev</li>
</ul>
<h2>Task 5 : Use Seed and Generate testing data for user table</h2>
<ul>
  <li><b>Create seeder : </b> php artisan make:seeder UserSeeder</li>
  <li>Update UserSeeder Class
    <ul>
      <pre>
    public function run()
    {
        //
        $name = Str::random(4);
        $email = $name . "@gmail.com";
        $pass = 'pass1234';
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pass)
        ]);
    }
      </pre>
    </ul>
  </li>
  <li><b>Run Seeder : </b> php artisan db:seed --class=UserSeeder</li>
</ul>
<h2>Task 6 & 7 :Datatable to show listing By Yajara & added edit,delete button columns</h2>
<ul>
  <li><b>Install Yajara : </b> composer require yajra/laravel-datatables-oracle</li>
  <li><b>config/app.php</b><pre>
    'providers' => [
    Yajra\DataTables\DataTablesServiceProvider::class,
    ]  
  </pre>
  </li>
  <li><b>Add Route : </b> Route::get('users', [UserController::class, 'index'])->name('users.index');</li>
  <li> Create Controller and Define Method
    <pre>
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
      
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('users');
    }
    </pre>
  </li>
  <li>Create View and Add Java script
  <pre>
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  </pre>
    
  </li>
  <li>Run Code</li>
</ul>
<h2>Task 9 : Create Add-Edit-Delete  for user with validatiion</h2>
<ul>
  <li>Create a View File containing form to add/Edit </li>
  <li>Create Route For that View file</li>
  <li>Add Controller to save the Data when form is submitted.</li>
  <li>Use the datatable which is created earlier to delete and edit record</li>
  <li>Create a controller to handle edit and delete events.</li>
</ul>
<h2>Task 10 : Getter / Setter method ( accessor / mutator )</h2>
<ul>
  <li>Add Function in model of users table to create accesor
      <pre>
  public function getFullNameAttribute($value)
  {
      return " $this->name $this->email";
  }
      </pre>
  </li>
  <li>Use this function name with predefined formate in controller to access this function value
    <ul>
      <li>User::find($id)->full_name;</li>
    </ul> 
  </li>
</ul>
<h2>Task 11 : Model we can add custom method addDate</h2>
<ul>
  <li>Create a custom method in Model and use the Carbon to create Expire Date
    <pre>
    public function addDate($days)
    {
        $current = Carbon::create($this->mfd);
        $this->ex_date = $current->addDays($days);
    }
    </pre>
  </li>
  <li>Create a blade file to get Inputs</li>
  <li>
    In constuctor Use addDate method 
    <pre>
    function addProduct(Request $req)
    {
        $product = new product;
        $product->name = $req->name;
        $product->mfd = $req->input('date');
        $product->addDate($req->days);
        $product->save();
        return redirect(url()->previous());
    }
    </pre>
  </li>
  <li>By followinf these steps product will be added to DB with Expire Date.</li>
</ul>
<h2>Task 8A : Send Email via php artisan</h2>
<li>Generate App password in your gmail account</li>
<li>
  Set Configuration in env file (Use App password in env file)
  <pre>
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=abc
MAIL_PASSWORD=****
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=abc@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
  </pre>
</li>
<li>Create mail class MyTestMail for email sending : <b> php artisan make:mail MyTestMail</b>
  <pre>
    public function __construct($details)
    {
        $this->details = $details;
    }
    public function build()
    {
        return $this->subject('Mail from ItSolutionStuff.com')
                    ->view('emails.myTestMail');
    }
  </pre>
</li>
<li>Create a Blade View to send in email</li>
<li>Add Route To send mail
  <pre>
    Route::get('send-mail', function () { 
    $details = [
        'title' => 'Mail from Janvi',
        'body' => 'This is for testing email using smtp'
    ];
    Mail::to('xyz@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is Sent.");
});
  </pre>
</li>
<li>Run Code</li>
<h2>Task 8B : Send Email on Delete</h2>
<ul>
  <li>Call route of send mail on delete success.
    <pre>
  function Delete($id)
  {
      $data = User::find($id);
      $result = $data->delete();
      if ($result) {
          return redirect('send-mail');
      } else {
          return "try again";
      }
  }
    </pre>
  </li>
</ul>
<h2>Task 8C :To configur mail Use model on Delete (Observable)</h2>
<ul>
  <li>Create observers class for User <b>php artisan make:observer UserObserver --model=User</b></li>
  <li>To send mail after deleting row add function :
    <pre>
    public function deleted(User $user)
    {
        \Mail::raw('Hello, Your record in user table is deleted.', function ($message) {
            $message->from('sender@gmail.com', 'sender name');
            $message->to('reciever@gmail.com');
            $message->subject('Register again..!');
        });
    }
    </pre>
  </li>
  <li>Register Observers class on provider : <b> app/Providers/EventServiceProvider.php</b>
    <pre>
  public function boot()
  {
      User::observe(UserObserver::class);
  }
    </pre>
  </li>
  <li>Create controller To delete record and register it in route.php</li>
</ul>
<h2>Task 8C : Send mail using mailable</h2>
<ul>
  <li>Create Mailable Class
  <pre>
  public function build()
  {
      return $this->view('mailable');
  }
  </pre>
  </li>
  <li>Create controller and add route (my-test-mail) for it
    <pre>
  public function myTestMail()
  {
    $myEmail = 'abc@gmail.com';
    Mail::to($myEmail)->send(new MyTestMailable());
    dd("Mail Send Successfully");
  }
    </pre>
  </li>
  <li>add View File : mailable.blade.php</li>
</ul>
<h2>Task 12 : On Creating Observable => Create Refrence of 6 Digit </h2>
<ul>
  <li>Create observaer for product and use saving method to Insert data in DB</li>
  <li>Use blade view to get all other field of table </li>
  <li>use controller to save data in DB</li>
</ul>
<h2>Update Task 7 : Yajara Column Render at Client side</h2>
<ul>
  <li>user.blade.php  (Client Side)
    <pre>
    columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'FullName', name: 'FullName'},
        {data: 'action', name: 'Actiona', orderable: false, searchable: false,render:function (data,type,row){
            console.log(data);
             var btn = '** buttons you want **';
           return btn;
        }},
    ]
    </pre>
  </li>
  <li>Controller 
    <pre>
  public function index(Request $request)
  {
      if ($request->ajax()) {
          $data = User::select('*');
          return Datatables::of($data)
              ->addIndexColumn()->addColumn('FullName', function ($row) {
                  return User::find($row->id)->full_name;
              })
              ->addColumn('action', function ($row) {
                  return $row->id;
              })
              ->rawColumns(['action'])
              ->make(true);
      }
      return view('users');
  }
    </pre>  
  </li>
</ul>
<h2>Update Task 5 Seeder</h2>
<ul>
  <pre>
public function run()
{
    $count = 10;
    //
    while ($count > 0) {
        $name = Str::random(4);
        $email = $name . "@gmail.com";
        $pass = 'pass1234';
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pass)
        ]);
        $count--;
    }
    //User::factory(User::class, 5)->create();
}
  </pre>
</ul>
<h2>Update Task 7 Send Data with ajax in Yajara</h2>
<ul>
  <li>Sending data
    <pre>
  ajax: {
        url: "{{ route('users.index') }}",
        type: "GET",
        data: function (d) {
            // You can pass additional data here
            d.custom_param = 'Mansi';
        },
    },
    </pre>
  </li>
  <li>Recieving Data in Controller 
    <pre>
  $customParam = $request->input('custom_param');
  if ($request->ajax()) {;
        $data = User::select('*')
        ->where('name', $customParam)
        ->get();
        return Datatables::of($data)
            ->addIndexColumn()->addColumn('FullName', function ($row) {
                return User::find($row->id)->full_name;
            })
            ->addColumn('action', function ($row) {
                return $row->id;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    </pre>
  </li>
</ul>

