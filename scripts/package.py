"""Build an installable theme ZIP without Git metadata or local tooling."""
from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED
import sys

root = Path(__file__).resolve().parent.parent
output = Path(sys.argv[1]).resolve() if len(sys.argv) > 1 else Path('/private/tmp/allianz-therapietreue.zip')
paths = ['style.css', 'theme.json', 'functions.php', 'screenshot.png', 'README.md', 'assets', 'templates', 'parts', 'patterns', 'scripts', 'docs']
with ZipFile(output, 'w', ZIP_DEFLATED) as archive:
    for name in paths:
        source = root / name
        for file in ([source] if source.is_file() else sorted(source.rglob('*'))):
            if file.is_file() and file.name != '.DS_Store' and '__pycache__' not in file.parts:
                archive.write(file, Path('allianz-therapietreue') / file.relative_to(root))
print(output)
print(f'{output.stat().st_size:,} bytes')
