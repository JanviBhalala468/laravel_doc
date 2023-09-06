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
