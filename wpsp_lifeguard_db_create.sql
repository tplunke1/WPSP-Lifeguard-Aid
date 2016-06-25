DROP TABLE lifeguard_leave;
CREATE TABLE lifeguard_leave
(
lifeguard_id tinyint,
start_date date,
end_date date
);

INSERT INTO lifeguard_leave
VALUES (1, '2016-6-24', '2016-6-24');