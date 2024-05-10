<h1>MailTest</h1>
<?php
    
    use Illuminate\Support\Facades\Mail;
    use App\Mail\OrderCompleted;
    Mail::to("rauldominguezsalgado@gmail.com")->send(new OrderCompleted($order));
?>