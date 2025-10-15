import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import LandingPage from './pages/LandingPage';
import Login from './pages/Login';
import Register from './pages/Register';
import CreateAppointment from './pages/CreateAppointment';
import CreatePrescription from './pages/CreatePrescription';


function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<LandingPage />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/create-appointment" element={<CreateAppointment />} />
        <Route path="/create-prescription" element={<CreatePrescription />} />
      </Routes>
    </Router>
  );
}

export default App;
