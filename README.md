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
