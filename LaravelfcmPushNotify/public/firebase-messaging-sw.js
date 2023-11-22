// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyA7yJjTqx4m1KGmg9cqhsP7rTrqwRyF2_U",
  authDomain: "notification-eabc2.firebaseapp.com",
  projectId: "notification-eabc2",
  storageBucket: "notification-eabc2.appspot.com",
  messagingSenderId: "475537358748",
  appId: "1:475537358748:web:3aefcf357796af7b8cd259",
  measurementId: "G-KTJSHWBPCF"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);