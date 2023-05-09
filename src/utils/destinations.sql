CREATE TABLE destinations (
                              id INT NOT NULL AUTO_INCREMENT,
                              location_name VARCHAR(255) NOT NULL,
                              country_name VARCHAR(255) NOT NULL,
                              description TEXT,
                              tourist_targets TEXT,
                              estimated_cost_per_day DECIMAL(10,2),
                              PRIMARY KEY (id)
);

CREATE TABLE destinations (
                              id INT NOT NULL AUTO_INCREMENT,
                              location_name VARCHAR(255) NOT NULL,
                              country_name VARCHAR(255) NOT NULL,
                              description TEXT,
                              tourist_targets TEXT,
                              estimated_cost_per_day DECIMAL(10,2) NOT NULL CHECK (estimated_cost_per_day >= 0),
                              PRIMARY KEY (id)
);

INSERT INTO destinations (location_name, country_name, description, tourist_targets, estimated_cost_per_day)
VALUES
    ('Paris', 'France', 'The city of love', 'Eiffel Tower, Louvre Museum, Notre-Dame Cathedral', 100),
    ('Marseille', 'France', 'A port city on the Mediterranean coast', 'Old Port, Notre-Dame de la Garde, Calanques', 80),
    ('Lyon', 'France', 'A historic city in eastern France', 'Basilique Notre-Dame de Fourvière, Vieux Lyon, Musée des Confluences', 90),
    ('Nice', 'France', 'A resort town on the French Riviera', 'Promenade des Anglais, Colline du Château, Musée Matisse', 110),
    ('Bordeaux', 'France', 'A city known for its wine and architecture', 'Place de la Bourse, Cité du Vin, Musée d\'Aquitaine', 95),
    ('Strasbourg', 'France', 'A city with a unique blend of French and German culture', 'Cathédrale Notre-Dame de Strasbourg, La Petite France, Palais Rohan', 85),
    ('London', 'United Kingdom', 'The city of Big Ben and Buckingham Palace', 'London Eye, Tower Bridge, British Museum', 120),
    ('Edinburgh', 'United Kingdom', 'A historic city in Scotland', 'Edinburgh Castle, Royal Mile, Arthur\'s Seat', 100),
    ('Manchester', 'United Kingdom', 'A vibrant city in northern England', 'Old Trafford, Manchester Cathedral, Northern Quarter', 80),
    ('Bath', 'United Kingdom', 'A city famous for its Roman baths', 'Roman Baths, Bath Abbey, Pulteney Bridge', 90),
    ('Rome', 'Italy', 'The eternal city', 'Colosseum, Vatican City, Trevi Fountain', 90);

DROP TABLE destinations;
