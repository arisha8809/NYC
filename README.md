﻿---

# 🌆 **NYC: Explore New York City's Iconic Culture** 🎥🎶📚

![NYC Banner](screenshots/banner.png)

Welcome to **NYC**, an interactive map-based website that takes you on a journey through the heart of **New York City**! This website allows users to explore NYC’s iconic landmarks through their appearances in **movies**, **music**, and **books**. It offers an immersive and interactive experience with a combination of animations, a searchable map, and multimedia elements.

---
## 📸 **Screenshots**

### **3️⃣ Login and Signup Pages**
![Login Page](screenshots/login_page.png)
![Login Page](screenshots/signup_page.png)


- **Login Page:** Allows users to log in and access features like personalized preferences.
- **Signup Page:** Enables new users to create an account with:
  - **Password Confirmation**: Ensures security by verifying password inputs.
  - Redirects to the homepage after successful login.
 
---

### **1️⃣ Home Page with Scrolling Videos**
![Home Page](screenshots/home_page.png)

- **Feature:** The homepage greets users with an engaging **scrolling video animation** of NYC-themed movie clips.
- **Design:** The large "NEW YORK CITY" text provides a cinematic feel.
- **Purpose:** The scrolling videos introduce users to the theme of the website and set a visually engaging tone.

---

### **2️⃣ Search Bar, Interactive Map, and Gramophone**
![Search Bar and Map](screenshots/map_and_search.png)

- **Search Bar:**  
  - Enables users to search for landmarks by entering the name of a **movie**, **song**, **book**, or **location**.
  - Automatically zooms the map to the matching landmark upon finding a match.

- **Interactive Map:**  
  - Powered by **Leaflet.js**, the map showcases NYC landmarks with clickable markers.
  - Each marker opens a popup with:
    - 🎞️ Movies filmed at the location.
    - 🎵 Songs inspired by the landmark.
    - 📚 Books set in the area.
    - 🧐 Fun trivia about the location.

- **Gramophone Feature:**  
  - A gramophone icon located on the map allows users to enjoy the nostalgic track *"Autumn in New York"*.
  - **Hover**: Starts the music.  
  - **Click**: Pauses the music.

---

### **4️⃣ Popups with Cultural Information**
![Popups](screenshots/popup.png)

- **Popups on Map Markers:**  
  - Display detailed cultural information about each NYC landmark.
  - Include associated movies, songs, books, and trivia.
- **Purpose:** Helps users learn more about the historical and cultural significance of NYC’s landmarks.

---

## 🎬 **Features**

### **🎥 Scrolling Video Filmstrip**
- A visually engaging **filmstrip animation** of movie clips related to NYC.
- Loops continuously, providing an endless stream of cinematic scenes.

### **🗺️ Interactive Map**
- Clickable markers for each landmark.
- Popups contain detailed information, including:
  - 🎞️ Movies filmed there.
  - 🎵 Songs inspired by the location.
  - 📚 Books written about the area.
  - 🧐 Trivia for fun facts.

### **🔍 Search Bar**
- Type the name of a **movie**, **song**, **book**, or **location**.
- The map automatically zooms into the relevant landmark.

### **🎵 Gramophone Nostalgia**
- A gramophone feature adds an auditory layer of immersion:
  - **Hover:** Starts playing nostalgic NYC-themed music.
  - **Click:** Pauses the music.

---

## 💻 **Tech Stack**

- **Frontend:**
  - HTML5, CSS3, JavaScript (ES6+)
  - [Leaflet.js](https://leafletjs.com/) for interactive maps
- **Design:**
  - Custom CSS animations for filmstrip and smooth map interactions
  - Fully responsive design for desktop and mobile users
- **Hosting:**
  - GitHub Pages for static file hosting

---

## 🚀 **How It Works**

1. **Homepage Introduction:**  
   - The homepage showcases a scrolling video filmstrip and the bold "NEW YORK CITY" text.

2. **Search and Explore:**  
   - Users can search for landmarks by typing movie, song, or book names in the search bar.

3. **Interactive Popups:**  
   - Each map marker reveals popups with detailed cultural connections to movies, songs, and books.

4. **Audio Control:**  
   - Hovering over the gramophone plays the background music, and clicking pauses it.

---

## 🎨 **Customizations**

1. Open `nyc.html` and locate the `locations` array.
2. Add a new landmark in the following format:
   ```javascript
   {
       name: "New Landmark Name",
       coords: [latitude, longitude],
       movies: ["Movie 1", "Movie 2"],
       songs: ["Song 1", "Song 2"],
       books: ["Book 1", "Book 2"],
       trivia: "Interesting fact about the location."
   }
   ```

---

## 🤝 **Contributing**

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Make your changes and commit:
   ```bash
   git commit -m "Added a new feature"
   ```
4. Push your changes:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request on GitHub.

---

## 🌟 **Support**
If you found this project helpful, please give it a ⭐!  
Feel free to open an issue for any questions or suggestions.

---

## 📄 **License**
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## 🎉 **Acknowledgments**
- **Leaflet.js** for powering the interactive maps.
- **OpenStreetMap** for the map tiles.
- NYC’s cultural legacy for inspiring this project.

---

### 💡 **Fun Fact**
New York City has been featured in over **3000 movies** — more than any other city in the world! 🎞️

--- 
