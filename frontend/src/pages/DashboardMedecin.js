import React, { useState } from "react";
import { PieChart, Pie, Cell, Tooltip, Legend } from "recharts";
import "../styles/Dashboard.css";


function DashboardMedecin() {
  const data = [
    { name: "Terminées", value: 5 },
    { name: "En attente", value: 3 },
    { name: "Annulées", value: 1 },
  ];
  const COLORS = ["#10b981", "#3b82f6", "#ef4444"];

  return (
    <div className="dashboard-container dashboard-medecin">
      <h2>Bienvenue Médecin</h2>
      <h3>Statistiques de consultations</h3>
      <PieChart width={300} height={250}>
        <Pie data={data} dataKey="value" cx="50%" cy="50%" outerRadius={80} label>
          {data.map((entry, index) => (
            <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
          ))}
        </Pie>
        <Tooltip />
        <Legend />
      </PieChart>
    </div>
  );
}

export default DashboardMedecin;
