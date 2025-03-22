CREATE DATABASE IF NOT EXISTS votacion_db;
USE votacion_db;

CREATE TABLE admins (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(255) NOT NULL,
                        lastName VARCHAR(255) NOT NULL,
                        email VARCHAR(255) UNIQUE NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE voters (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(255) NOT NULL,
                        lastName VARCHAR(255) NOT NULL,
                        document VARCHAR(255) UNIQUE NOT NULL,
                        dob DATE NULL,
                        is_candidate BOOLEAN DEFAULT FALSE,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE votes (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       candidate_id INT NOT NULL,
                       candidate_voted_id INT NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                       FOREIGN KEY (candidate_id) REFERENCES voters(id) ON DELETE CASCADE,
                       FOREIGN KEY (candidate_voted_id) REFERENCES voters(id) ON DELETE CASCADE
);

INSERT INTO admins (name, lastName, email, password) VALUES
    ('Admin', 'Admin', 'admin@example.com', '$2y$12$v6621w5BoDNAsUlV387Psu76T40ISXJwS32iCTuW3Sp5nVdslGAJC'); --Password admin1234

INSERT INTO voters (name, lastName, document, dob, is_candidate) VALUES
                                                                     ('Camilo', 'Caminada', '48894811', '1991-05-18', TRUE),
                                                                     ('Juan', 'Gómez', '87654321', '1985-11-20', FALSE),
                                                                     ('Carlos', 'Fernández', '11223344', '1993-07-15', TRUE);

INSERT INTO votes (candidate_id, candidate_voted_id) VALUES
                                                         (2, 1),
                                                         (3, 1);
