SELECT
    CASE WHEN `class` IS NOT NULL AND `class` > 0
        THEN CONCAT(`class`, '�g')
    END AS '�N���X',
    
    `s`.`id` AS '�ԍ�'
    
    CONCAT(sei ,mei) AS '���O',             -- �����񍇑�
    
    THEN CASE WHEN `test1` IS NULL          -- �e�X�g�_����NULL�łȂ��ꍇ
        THEN CONCAT(`test1`,'�_')           -- �_�� + �u�_�v
        ELSE '-'
    END AS '�e�X�g1',
    THEN CASE WHEN `test2` IS NULL
        THEN CONCAT(`test2`,'�_')
        ELSE '-'
    END AS '�e�X�g2',
    THEN CASE WHEN `test3` IS NULL
        THEN CONCAT(`tes31`,'�_')
        ELSE '-'
    END AS '�e�X�g3',
    THEN CASE WHEN `test4` IS NULL
        THEN CONCAT(`tes41`,'�_')
        ELSE '-'
    END AS '�e�X�g4',
    THEN CASE WHEN `test5` IS NULL
        THEN CONCAT(`tes51`,'�_')
        ELSE '-'
    END AS '�e�X�g5',

    -- �O���܂��͌���Ő��уI�[��5����ꂽ�ꍇ�ɕ\��
    CASE WHEN `all5_num` IS NOT NULL
        THEN CASE `all5_num` 
            WHEN 1 THEN CONCAT('5����', 
                CASE `all5_period`
                    WHEN 1 THEN '�O��'
                    WHEN 2 THEN '���'
                END,
                '�I�[��5')
            WHEN 2 THEN CONCAT('3����', 
                CASE `all5_period`
                    WHEN 1 THEN '�O��'
                    WHEN 2 THEN '���'
                END,
                '�I�[��5')
        END
    END AS '���L����',

FROM
    `students` AS `s`

ORDER BY
    `s`.`class` ASC,
    `s`.`id` ASC
