SELECT
    CASE WHEN `class` IS NOT NULL AND `class` > 0
        THEN CONCAT(`class`, '組')
    END AS 'クラス',
    
    `s`.`id` AS '番号'
    
    CONCAT(sei ,mei) AS '名前',             -- 文字列合体
    
    THEN CASE WHEN `test1` IS NULL          -- テスト点数がNULLでない場合
        THEN CONCAT(`test1`,'点')           -- 点数 + 「点」
        ELSE '-'
    END AS 'テスト1',
    THEN CASE WHEN `test2` IS NULL
        THEN CONCAT(`test2`,'点')
        ELSE '-'
    END AS 'テスト2',
    THEN CASE WHEN `test3` IS NULL
        THEN CONCAT(`tes31`,'点')
        ELSE '-'
    END AS 'テスト3',
    THEN CASE WHEN `test4` IS NULL
        THEN CONCAT(`tes41`,'点')
        ELSE '-'
    END AS 'テスト4',
    THEN CASE WHEN `test5` IS NULL
        THEN CONCAT(`tes51`,'点')
        ELSE '-'
    END AS 'テスト5',

    -- 前期または後期で成績オール5が取れた場合に表示
    CASE WHEN `all5_num` IS NOT NULL
        THEN CASE `all5_num` 
            WHEN 1 THEN CONCAT('5教科', 
                CASE `all5_period`
                    WHEN 1 THEN '前期'
                    WHEN 2 THEN '後期'
                END,
                'オール5')
            WHEN 2 THEN CONCAT('3教科', 
                CASE `all5_period`
                    WHEN 1 THEN '前期'
                    WHEN 2 THEN '後期'
                END,
                'オール5')
        END
    END AS '特記事項',

FROM
    `students` AS `s`

ORDER BY
    `s`.`class` ASC,
    `s`.`id` ASC
