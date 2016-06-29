DROP TABLE IF EXISTS lifeguard_leave;
CREATE TABLE lifeguard_leave
(
lifeguard_id tinyint NOT NULL,
start_date date NOT NULL,
end_date date NOT NULL,
PRIMARY KEY (lifeguard_id)
);
