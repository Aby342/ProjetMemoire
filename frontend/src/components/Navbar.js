import React from "react";
import { Link } from "react-router-dom";
import "./Navbar.css"; // optionnel si tu veux styliser

export default function Navbar({ title }) {
  return (
    <nav className="navbar">
      <h1>{title || "Plateforme Santé"}</h1>
      <div className="nav-links">
        <Link to="/patient">Espace Patient</Link>
        <Link to="/medecin">Espace Médecin</Link>
        <Link to="/admin">Espace Admin</Link>
        <Link to="/login">Connexion</Link>
      </div>
    </nav>
  );
}
