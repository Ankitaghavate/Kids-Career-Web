const express = require("express");
const path = require("path");
const bodyParser = require("body-parser");
const cors = require("cors");

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, "public"))); // Serve static files

// Serve HTML file
app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

// Handle form submission
app.post("/signup", (req, res) => {
    const { name, email, password, age, education, interests, terms } = req.body;
    
    if (!name || !email || !password || !age || !education || !interests || !terms) {
        return res.status(400).json({ message: "All fields are required" });
    }
    
    // Simulate saving data (In real-world, save to a database)
    console.log("New user registered:", req.body);
    
    res.status(200).json({ message: "Sign-up successful!" });
});

// Start server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
