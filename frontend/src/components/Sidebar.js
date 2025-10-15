import React from "react";
import "./Sidebar.css"; // optionnel

export default function Sidebar({ onSelect }) {
  return (
    <aside className="sidebar">
      <h2>Menu</h2>
      <ul>
        <li onClick={() => onSelect("accueil")}>Accueil</li>
        <li onClick={() => onSelect("rendezvous")}>Rendez-vous</li>
        <li onClick={() => onSelect("historique")}>Historique</li>
        <li onClick={() => onSelect("patients")}>Patients</li>
        <li onClick={() => onSelect("consultations")}>Consultations</li>
      </ul>
    </aside>
  );
}
