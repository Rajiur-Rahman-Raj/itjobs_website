<h4>Dear Customer,<h4>

<h4>
    Your payment for the job post on ITJobsBD has been successfully confirmed.
<h4>

    <p>
        Job Title: {{$approve->job_name}}<br>
        Company Name: {{$approve->company_name}}<br>
        Company Email: {{$approve->company_email}}<br>
        Website Link: {{$approve->website_link}}<br>
        Apply Link: {{$approve->apply_link}}<br>
        Total Cost: {{$approve->total_cost}} Taka
    </p>

    <p>To checked the posted cv for your job, Login in to this link https://itjobsbd.com/login using login credentials</p>

    <p>
        Login Email : {{$approve->company_email}}<br>
        @if($approve->password == null)
        Password : (we had send the password during your first job post)
        @else
        Password : {{$approve->password}}
        @endif
    </p>

<h4>Incase of any changes required, queries or concern please reach out to admin@itjobsbd.com.
</h4>

<h4>Have a great day!</h4>
<h4>ITJobsBD Team</h4>


