<?php

$q = new SplQueue(); // PHP標準のキュー

function prompt(string $msg): string {
    echo $msg;
    $line = fgets(STDIN);
    return $line === false ? '' : trim($line);
}

echo "=== Queue Program ===\n";
echo "[1] Enqueue  [2] Dequeue  [3] Front  [4] IsEmpty  (その他: 終了)\n";

while (true) {
    $mode = prompt("モード選択 > ");
    if (!ctype_digit($mode)) break;        
    $mode = (int)$mode;
    if ($mode < 1 || $mode > 4) break;       

    switch ($mode) {
        case 1: // Enqueue
            $data = prompt("データ入力（enqueue）> ");
            $q->enqueue($data);
            echo "→ enqueued: {$data}\n";
            break;

        case 2: // Dequeue
            if ($q->isEmpty()) {
                echo "empty\n";
            } else {
                $v = $q->dequeue();
                echo "→ dequeued: {$v}\n";
            }
            break;

        case 3: // Front
            if ($q->isEmpty()) {
                echo "empty\n";
            } else {
                echo "→ front: " . $q->bottom() . "\n"; 
            }
            break;

        case 4: // IsEmpty
            echo $q->isEmpty() ? "empty\n" : "not empty\n";
            break;
    }
}
echo "終了します。\n";
