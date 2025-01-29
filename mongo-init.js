db = db.getSiblingDb("zoarcadia");
db.createUser({
    user: "zoarcadia",
    pwd: "zoarcadia",
    roles: [
        {
            role: "readWrite",
            db: "zoarcadia"
        }
    ]
})
