
    <footer>
        <nav class="navbar navbar-expand-md navbar-dark bg-#1d1d1c">
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"> &copy Paulus Pandu Windito 2022</a> 
                    </li>
                    <li class="nav-item">
                        <span id="view_clock" class="nav-link"></span>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.linkedin.com/in/pandu-windito-14b064254/" target="_blank"> LinkedIn </a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/pandu_windito/" target="_blank">Instagram</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/just4fun147" target="_blank">Github</a> 
                    </li>
                </ul>
            </div>
        </nav>
    </footer>

    <script type="text/javascript">
        timerID = setInterval('clock()',500); 
        function clock() {
            document.getElementById("view_clock").innerHTML = getNow();
        }
        var toDoubleDigits = function(num) {
            num += "";
            if (num.length === 1) {
                num = "0" + num;
            }
            return num;     
        };

        function getNow() {
            var now = new Date();
            var hour = toDoubleDigits(now.getHours());
            var min = toDoubleDigits(now.getMinutes());

            //出力用
            if(hour>12){
                ap = "PM";
            } else{
                ap = "AM";
            }
            var s1 = hour + ":" + min + " " + ap;
            
            return s1;
        }
    </script>
