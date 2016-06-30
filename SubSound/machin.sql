SELECT
(
  SELECT count(*)
  FROM `like_par`
  WHERE id_repr = r.id
)as mescouilles,
r.id as repid,
r.nom as repnom,
description,
station,
user.nom,
id_artiste
FROM
  `representation` r
  INNER JOIN user ON user.id = id_artiste
--   INNER JOIN like_par ON like_par.id_repr = representation.id
