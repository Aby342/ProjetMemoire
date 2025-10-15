import React, { useState, useEffect } from "react";
import api from "../api/axios";
import "../styles/Dashboard.css";


function DashboardPatient() {
  const [rendezVous, setRendezVous] = useState([]);

  useEffect(() => {
    api.get("/appointments")
      .then((res) => setRendezVous(res.data))
      .catch((err) => console.error(err));
  }, []);

  return (
    <div className="dashboard-container dashboard-patient">
      <h2>Bienvenue Patient</h2>
      <h3>Mes Rendez-vous</h3>
      <ul>
        {rendezVous.map((rv, idx) => (
          <li key={idx}>
            📅 {rv.date} - {rv.heure} - {rv.medecin?.name} ({rv.specialite})
          </li>
        ))}
      </ul>
    </div>
  );
}

export default DashboardPatient;
