@php
    function wrapDescription($text, $charsPerLine, $maxLines = 2) {

      if (trim($text) === substr($text, 0, $charsPerLine + 1) && strlen($text) > $charsPerLine) {
        return substr($text, 0, $charsPerLine);
      }

      $wrappedText = '';
      $words = explode(' ', $text);
      $lineCount = 0;
      $currentLine = '';

      foreach ($words as $word) {
        if (strlen($currentLine . $word) > $charsPerLine) {
          $wrappedText .= $currentLine . "\n";
          $lineCount++;
          $currentLine = '';
        }
        $currentLine .= $word . ' ';

        if ($lineCount >= $maxLines) {
          $wrappedText .= $currentLine;
          break;
        }
      }

      // Add the last line if necessary
      if (trim($currentLine) !== '') {
          $wrappedText .= $currentLine;
      }

      return $wrappedText;
    }


@endphp
