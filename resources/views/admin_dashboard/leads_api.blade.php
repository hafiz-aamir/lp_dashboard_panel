@extends('layouts.backend')

@section('css')
<style>


.code-container {
    position: relative;
    background-color: #1e1e1e;
    color: #dcdcdc;
    border-radius: 5px;
    padding: 15px;
    margin-top: 20px;
    font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
    font-size: 14px;
    overflow-x: auto;
}

.code-container pre {
    margin: 0;
}

.copy-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
}

.copy-btn:active {
    background-color: #45a049;
}

pre code {
    font-size: 15px !important;
    color: inherit;
    word-break: normal;
}

</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="{{ route('leads') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to Lead List</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Leads API</h3>
    </div>
    <div class="boxLeadDetail mt-4">
        
        <div class="row">

            <div class="col-md-6">

                <div class="row mb-3">
                    <label class="col-form-label">First Name</label>
                    <div class="">
                        <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->name }}" name="name" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">Email</label>
                    <div class="">
                        <input type="email" class="form-control inpCust" value="{{ $get_lead_by_id->email }}" name="email" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">Phone Number</label>
                    <div class="">
                        <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->phone }}" name="phone" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">Message</label>
                    <div class="">
                        <textarea name="message" class="form-control inpCust" rows="3" readonly> {{ $get_lead_by_id->message }} </textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">Created At</label>
                    <div class="">
                        <input type="text" class="form-control inpCust" value="{{ \Carbon\Carbon::parse($get_lead_by_id->created_at)->format('Y-m-d H:i:s a') }}" name="created_at" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">Brand Name</label>
                    <div class="">
                        <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->brand_name }}" name="brand_name" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">Page URL</label>
                    <div class="">
                        <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->page_url }}" name="page_url" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label">IP Address</label>
                    <div class="">
                        <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->ip }}" readonly name="ip">
                    </div>
                </div>

            </div>

            <div class="col-md-6">
            
            <div class="code-container">
    <button class="copy-btn" onclick="copyCode()">Copy Code</button>
    <pre><code id="code-snippet">
&lt;?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dashboard.codetech.pk/public/api/leads',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "name": "{{ $get_lead_by_id->name }}",
    "email": "{{ $get_lead_by_id->email }}",
    "phone": "{{ $get_lead_by_id->phone }}",
    "message": "{{ $get_lead_by_id->message }}",
    "ip": "{{ $get_lead_by_id->ip }}",
    "brand_name": "{{ $get_lead_by_id->brand_name }}",
    "page_url": "{{ $get_lead_by_id->page_url }}"
}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
    </code></pre>
</div>

            </div>

        </div>

    </div>

</div>


@endsection

@section('js')
<script type="text/javascript">
    
    function copyCode() {
        var code = document.getElementById("code-snippet").innerText;
        var textarea = document.createElement("textarea");
        textarea.value = code;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
        alert("Code copied to clipboard!");
    }
    
</script>
@endsection
