// src/pages/LandingPage.js
import React, { useEffect, useState } from "react";
import Navbar from "../components/Navbar";
import Sidebar from "../components/Sidebar";
import { LineChartComponent, PieChartComponent } from "../components/Charts";
import Loader from "../components/Loader";
import api from "../api/axios";
import "../styles/Dashboard.css";
import { Row, Col, Button } from "react-bootstrap";


export default function LandingPage() {
  const [doctors, setDoctors] = useState([]);
  const [loading, setLoading] = useState(true);
  const [activeTab, setActiveTab] = useState("accueil");

  useEffect(() => {
    api.get("/doctors")
      .then(res => setDoctors(res.data))
      .catch(err => console.error(err))
      .finally(() => setLoading(false));
  }, []);

  const chartData = [
    { name: "Cardiologie", value: 4 },
    { name: "Dermatologie", value: 2 },
    { name: "Pédiatrie", value: 3 },
  ];
  const colors = ["#10b981", "#3b82f6", "#f59e0b"];

  return (
    <div className="dashboard-container">
      <Navbar title="KAAY FAJU" />
      <div className="dashboard-content-wrapper">
        <Sidebar onSelect={setActiveTab} />

        <main className="dashboard-content">
          {loading ? (
            <Loader />
          ) : (
            <>
              {activeTab === "accueil" && (
                <>
                  <h2>Bienvenue sur la plateforme</h2>
                  <p>Consultez un médecin en ligne 7j/7</p>

                  <div className="section">
                    <h3>Médecins disponibles</h3>
                    <Row>
                      {doctors.map((doc) => (
                        <Col key={doc.id} md={4}>
                          <div className="info-card">
                            <h4>{doc.name}</h4>
                            <p>{doc.specialty}</p>
                            <Button variant="success" href="/create-appointment">
                              Prendre RDV
                            </Button>
                          </div>
                        </Col>
                      ))}
                    </Row>
                  </div>

                  <div className="section">
                    <h3>Statistiques par spécialité</h3>
                    <PieChartComponent data={chartData} colors={colors} />
                  </div>
                </>
              )}

              {activeTab === "stats" && (
                <div className="section">
                  <h3>Évolution des consultations</h3>
                  <LineChartComponent
                    data={[
                      { name: "Jan", consultations: 10 },
                      { name: "Fév", consultations: 15 },
                      { name: "Mars", consultations: 20 },
                    ]}
                    dataKey="consultations"
                  />
                </div>
              )}
            </>
          )}
        </main>
      </div>
    </div>
  );
}
