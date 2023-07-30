
<form method="POST" action="{{Route('send-otp')}}">
     @csrf
     <!-- Your form fields here -->
    <button type="submit">Send OTP</button>
</form>