import React from "react";
import "./Loader.css"; // optionnel

export default function Loader() {
  return (
    <div className="loader-container">
      <div className="spinner"></div>
      <p>Chargement en cours...</p>
    </div>
  );
}
