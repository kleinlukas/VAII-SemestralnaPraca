CREATE TABLE IF NOT EXISTS `bands` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `genre` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `setup_time` INT NOT NULL DEFAULT 30,
    `description` TEXT DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bands` (`name`, `genre`, `email`, `setup_time`, `description`) VALUES
        ('Band 1', 'Hard Rock', 'contact@band1.com', 30, 'Energická hard-rocková kapela so skúsenosťami z veľkých pódií.'),
        ('Band 2', 'Heavy Metal', 'booking@band2.com', 45, 'Hlavný headliner piatkového večera s vlastnou pyrotechnikou.'),
        ('Band 3', 'Power Metal', 'info@band3.sk', 25, 'Rýchle gitarové sóla a melodické refrény.'),
        ('Band 5', 'rock', 'noise@band5.org', 20, 'Alternatívny noise-rockový projekt pre klubové pódium.'),
        ('Band 6', 'Deathcore', 'management@band6.com', 40, 'Tvrdá zostava vyžadujúca rozšírený zvukový aparát.');