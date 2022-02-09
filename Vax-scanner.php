
<div class="container" style = "margin-bottom:20%">
</br>
  <div class="row">
    <div class="col-md-8">
        <div style= "width:750px; height:1000px; background-color:rgba(0, 0, 0, 0.03);" class="text-center text-black">
        </br>
            <div>
                <h4><i>Vax Certificate Scanner</i></h4>
                <p>Decode your Ontario COVID-19 Vaccination QR code (<b>S</b>mart <b>V</b>ax <b>C</b>ard)</p></br>
            </div>
            <div style = "text-align:left;" class="card-body">
                @if(isset($success))
                    <div class="alert alert-success">
                        {{ $success }}
                    </div>
                @endif
                @if(isset($unsuccess))
                    <div class="alert alert-danger">
                        {{ $unsuccess}}
                    </div>
                @endif
               
                <div id="qr-reader" style = "margin-left:10px; width:700px; height:500px"></div>
                <div style = "margin-bottom:80px" id="qr-reader-results"></div>
                    
                <div id = "vax_results">
                    <!-- <p style="text-align:center; margin-top:20px">If you have completed two sources, you will be directed to Smart Health Card scanner.</p> -->

                    <table border=1 style = "margin-top:10px;width:700px; height:100px; margin:auto; border-color:rgba(0, 0, 0, 0.3);text-align:center" >
                        <thead>
                            <tr>
                                <th><b>First Name</b></th>
                                <th><b>Last Name</b></th>
                                <th><b>Birth Date</b></th>
                                <th><b>First Status</b></th>
                                <th><b>Second Name</b></th>
                            </tr>
                        </thead>
                        <tbody id="result">
                        @if (isset($vax))
                            <tr>  
                                <td>{{strtoupper($vax->first_name)}}</td>
                                <td>{{strtoupper($vax->last_name)}}</td>
                                <td>{{$vax->birth_date}}</td>
                                <td>{{$vax->first_status}}</td>
                                <td>{{$vax->second_status}}</td> 
                            </tr>
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table> 
                </div>
                </br>
                <form id="vax_form" method="GET" action="/vax-result" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                    <div>
                        <button type= "submit" id = "show-result" class = "btn btn-primary">Show Result</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div style = "width: 400px; height:1000px; background-color:rgba(0, 0, 0, 0.03);" class="text-center text-black">
            <div class="view view-cascade overlay">
                <img src="/images/vax-logo2.jpg" height= 270px class="card-img-top" alt="wider">
            </div>
            <div class="card-body card-body-cascade text-center">
                <h4 class="card-title">Vaccine Verification</h4></br>
                <div>
                    <h5><strong>Contact us </strong></h5></br>
                    <p><i class="fas fa-phone me-3"></i> 1-800-272-3002</p>
                    <p><i class="fas fa-home me-3"></i> 533 Clarence Street London ON, N6A3N1</p>  
                    <a class="fb-ic" href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fcampuscreative.ca%2F">
                        <i class="fab fa-facebook-f fa-lg black-text mr-4"> </i>
                    </a>
                    <a class="tw-ic" href="https://twitter.com/campus_creative">
                        <i class="fab fa-twitter fa-lg black-text mr-4"> </i>
                    </a>        
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


<section style = "display:none;">
    <h4>Vax Certificate Decoder</h4>  
    <section>
      <h5>Input:</h5>
        <input id="shc" type="text" placeholder="shc:/..." />
        <input type = "submit" id = "submit" value = "submit">
    </section>

    <section>
      <h5>Output:</h5>
      <details>

        <summary><b>Intermediary data</b></summary>
        <p>SHC</p>
        <code id="debug_shc" class="debug"></code>
        <br/>

        <p>JWT</p>
        <code id="debug_jwt" class="debug"></code>
        <br/>

        <p>JWT Header</p>
        <pre><code id="debug_jwt_header" class="debug"></code></pre>
        <br/>

        <p>JWT Payload - Encoded</p>
        <code id="debug_jwt_payload_encoded" class="debug"></code>
        <br/>

        <p>JWT Payload - Decoded (Uint8Array)</p>
        <code id="debug_jwt_payload_decoded" class="debug"></code>

      </details>

      <h5>Results:</h5>
      <pre><code id="output" style = "color:white">Results</code></pre>
    </section>

</section>

<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pako_inflate.min.js') }}"></script>

<script>

    function docReady(fn) {
        if (document.readyState === "complete" || document.readyState === "interactive") {
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                console.log(`Scan result ${decodedText}`, decodedResult);
            }
            document.getElementById('shc').value = decodedText;
            const input = document.querySelector('#shc'); 
            const change = new InputEvent('change');
            const isNotCancelled = input.dispatchEvent(change);
            document.location.reload(true);
            $("#vax_results").load(window.location + " #vax_results");

        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        });    
</script>



