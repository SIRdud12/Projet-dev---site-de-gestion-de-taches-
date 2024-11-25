CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE, -- Unicité pour éviter les doublons de nom d'utilisateur
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'employee') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    assigned_to INT, -- Permet NULL si la tâche n'est pas encore assignée
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL -- Maintenir l'intégrité référentielle
);

CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    recipient INT NOT NULL,
    type VARCHAR(50) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Changement pour inclure l'heure en plus de la date
    is_read BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (recipient) REFERENCES users(id) ON DELETE CASCADE -- Supprimer les notifications si l'utilisateur est supprimé
);
