const express = require('express')

const app = express()
app.listen(3000)
app.use(express.urlencoded({ extended: true}))
app.set("view engine", "ejs")

app.route("/")
    .get((req, res)=>{
        res.render("index", {name: "Not yet Entered"})
    })

app.route("/index")
    .get((req, res)=>{
        res.render("index")
    })
    .post((req, res)=>{
        if(req.body.name.length < 1){
            res.render("index", {name: "LOOOOOOL SHORT NAME"})
        }
        res.render("index", {name: req.body.name})
    })

app.route("/form")
    .get((req, res)=>{
        res.render("form")
    })