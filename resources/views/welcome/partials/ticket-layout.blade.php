<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ticket Layout</title>

        <script type="text/javascript" src="{{ asset('js/qz-tray.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sign-message.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsrsasign/11.1.0/jsrsasign-all-min.js"></script>

        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                padding: 20px;

                width: 100vw;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #ticketTemplate {
                border: 1px solid #000;
                width: fit-content;
                margin: 0 auto;
            }

            .ticket-container {
                display: flex;
                flex-direction: column;
                gap: 16px;
                padding: 32px;
                width: 500px;
                background-color: white;
                text-align: center;
            }

            .header {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                height: 50px;
                overflow: hidden;
            }

            .logo {
                height: 100%;
                width: auto;
            }

            .logo.invisible {
                opacity: 0;
            }

            .header-text {
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            .header-title {
                font-weight: 600;
                font-size: 16px;
            }

            .header-subtitle {
                font-size: 14px;
            }

            .queue-type {
                font-size: 20px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .queue-number {
                font-size: 144px;
                font-weight: 900;
                line-height: 1;
            }

            .date-time {
                font-size: 14px;
            }

            .instruction {
                font-size: 18px;
                text-transform: uppercase;
            }

            .thank-you {
                font-size: 18px;
                text-transform: uppercase;
            }

            @media print {
                body {
                    background-color: white;
                    padding: 0;
                }

                #ticketTemplate {
                    border: none;
                }
            }
        </style>
    </head>

    <body>
        <div id="ticketTemplate">
            <div class="ticket-container text-black">
                <!-- header -->
                <div class="header">
                    <img class="logo" src="{{ asset('images/dole-logo.png') }}" alt="DOLE Logo">
                    <div class="header-text">
                        <div class="header-title">Department of Labor and Employment</div>
                        <div class="header-subtitle">Cavite Provincial Office</div>
                    </div>
                    <img class="logo invisible" src="{{ asset('images/dole-logo.png') }}" alt="DOLE Logo">
                </div>

                <!-- body -->
                <div class="queue-type">{{ $queue_type }} NUMBER</div>
                <div class="queue-number">{{ str_pad($queue_number, 4, '0', STR_PAD_LEFT) }}</div>
                <div class="date-time">{{ now()->format('F j, Y - g:i A') }}</div>
                <div class="instruction">PLEASE PROCEED TO THE FRONT DESK, ONCE YOUR NUMBER IS CALLED.</div>
                <div class="thank-you">Thank You!</div>
            </div>
        </div>

        <script>
            window.onload = function() {
                const ticket = document.getElementById("ticketTemplate");

                /**
                 *  ============================ ============================
                 *  test download
                 *  ============================ ============================
                 **/
                html2canvas(ticket).then(function(canvas) {
                    const imageDataUrl = canvas.toDataURL("image/png");

                    console.log('Image Data Url: ', imageDataUrl);

                    // Create a download link for the image
                    const link = document.createElement("a");
                    link.href = imageDataUrl;

                    console.log('Image Data: ', link);
                    link.download = "{{ $queue_number }}.png"; // Filename for download

                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Redirect after download
                    setTimeout(function() {
                        window.location.href = "{{ route('welcome.index') }}";
                    }, 1500); // 1.5 seconds delay
                });

                /**
                 *  ============================ ============================
                 *  Uncomment the following code to enable printing with QZ Tray
                 *  ============================ ============================
                 **/
                // html2canvas(ticket).then(function(canvas) {
                //     const imageData = canvas.toDataURL("image/png").split(",")[1];

                //     console.log("Image Data:", imageData);

                //     qz.security.setCertificatePromise(function(resolve, reject) {
                //         //Preferred method - from server
                //         fetch("/keys/digital-certificate.txt", {
                //                 cache: 'no-store',
                //                 headers: {
                //                     'Content-Type': 'text/plain'
                //                 }
                //             })
                //             .then(function(data) {
                //                 data.ok ? resolve(data.text()) : reject(data.text());
                //             });
                //     });

                //     qz.websocket.connect().then(function() {
                //         return qz.printers.getDefault();
                //     }).then(function(printer) {
                //         const config = qz.configs.create(printer, {
                //             rasterize: true,
                //             colorType: 'grayscale',
                //             units: 'mm',
                //             size: {
                //                 width: 56,
                //                 height: 70
                //             },
                //             margins: {
                //                 left: 1,
                //                 right: 1,
                //                 top: 1,
                //                 bottom: 1
                //             }
                //         });

                //         const data = [{
                //             type: 'pixel',
                //             format: 'image',
                //             flavor: 'base64',
                //             data: imageData
                //         }];

                //         console.log("Printing to:", printer);
                //         console.log("Config:", config);

                //         return qz.print(config, data);

                //         /**
                //          *
                //          * code for downloading image instead of printing
                //          * (for testing purposes)
                //          *
                //          **/

                //         // const imageUrl = "data:image/png;base64," + imageData;
                //         // const link = document.createElement("a");
                //         // link.href = imageUrl;
                //         // link.download = "{{ $queue_number }}.png";
                //         // document.body.appendChild(link);
                //         // link.click();
                //         // document.body.removeChild(link);

                //     }).then(function() {
                //         window.location.href = "{{ route('welcome.index') }}";
                //     }).catch(function(e) {
                //         console.error("QZ Print error:", e);
                //         window.location.href = "{{ route('welcome.index') }}";
                //     });
                // });
            };
        </script>
    </body>

</html>
