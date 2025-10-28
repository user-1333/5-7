<?php

$stack = new SplStack(); 

function prompt(string $msg): string {
    echo $msg;
    $line = fgets(STDIN);
    return $line === false ? '' : trim($line);
}

echo "=== Stack Program ===\n";
echo "[1] Push  [2] Pop  [3] Peek  [4] IsEmpty  (その他: 終了)\n";

while (true) {
    $mode = prompt("モード選択 > ");
    if (!ctype_digit($mode)) break;
    $mode = (int)$mode;
    if ($mode < 1 || $mode > 4) break;

    switch ($mode) {
        case 1: // Push
            $data = prompt("データ入力（push）> ");
            $stack->push($data);
            echo "→ pushed: {$data}\n";
            break;

        case 2: // Pop
            if ($stack->isEmpty()) {
                echo "empty\n";
            } else {
                $v = $stack->pop();
                echo "→ popped: {$v}\n";
            }
            break;

        case 3: // Peek（先頭確認）
            if ($stack->isEmpty()) {
                echo "empty\n";
            } else {
                echo "→ peek: " . $stack->top() . "\n";
            }
            break;

        case 4: // IsEmpty
            echo $stack->isEmpty() ? "empty\n" : "not empty\n";
            break;
    }
}

echo "終了します。\n";
