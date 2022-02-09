
<div class="container" style = "margin-bottom:20%">

    <div style= "width:750px; height:1000px; background-color:rgba(0, 0, 0, 0.03);" class="text-center text-black">
        <div>
            <h4><i>Vax Certificate Scanner</i></h4>
            <p>Decode your Ontario COVID-19 Vaccination QR code (<b>S</b>mart <b>V</b>ax <b>C</b>ard)</p></br>
        </div>

        <div id="qr-reader"></div>
        <div id="qr-reader-results"></div>  
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

<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/pako_inflate.min.js"></script>

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



